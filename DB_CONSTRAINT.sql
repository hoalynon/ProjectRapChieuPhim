
-- check
alter table account
add constraint ck_account_role check (c_role in ('admin', 'customer', null));

alter table movie
add constraint ck_movie_start_end check (mv_end > mv_start);

alter table movie
add constraint ck_movie_restrict check (mv_restrict in ('R12', 'R15', 'R18', 'non', null));

alter table movie
add constraint ck_movie_cap check (mv_cap in ('Lồng tiếng', 'Phụ đề', null));

alter table customer
add constraint ck_customer_gender check (cus_gender in ('Nam', 'Nữ', 'Khác', null));

alter table customer
add constraint ck_customer_point check (cus_point >= 0);

alter table room
add constraint ck_room_capacity check (r_capacity >= 0);

alter table ticket
add constraint ck_ticket_available check (tk_available in (0, 1)); 

alter table slot
add constraint ck_slot_price check (sl_price >= 0);

alter table discount
add constraint ck_discount_start_end check (dis_end >= dis_start); 

alter table discount
add constraint ck_discount_percent check (dis_percent >= 0 && dis_percent <= 100); 

alter table monthlyrevenue
add constraint ck_month_month check (mre_month > 0 && mre_month < 13); 

-- trigger
delimiter //
create trigger trig_insert_movie_start
before insert
on movie
for each row
begin
	if new.mv_start < str_to_date(current_date(), '%Y-%m-%d') then
		signal sqlstate '45000' 
        set mysql_errno = 1, message_text = 'Ngày bắt đầu không được nhỏ hơn ngày hiện tại';
	end if;
end//
delimiter ;

delimiter //
create trigger trig_update_movie_start
before update
on movie
for each row
begin
	if new.mv_start < str_to_date(current_date(), '%Y-%m-%d') then
		signal sqlstate '45000' 
        set mysql_errno = 2, message_text = 'Ngày bắt đầu không được nhỏ hơn ngày hiện tại';
	end if;
end//
delimiter ;

delimiter //
create trigger trig_insert_customer
before insert
on customer
for each row
begin
	if new.cus_dob >= str_to_date(current_date(), '%Y-%m-%d') then
		signal sqlstate '45000' 
        set mysql_errno = 3, message_text = 'Ngày sinh phải nhỏ hơn ngày hiện tại';
	end if;
    if new.cus_point is null then
		set new.cus_point = 0;
	end if;
end//
delimiter ;

delimiter //
create trigger trig_update_customer
before update
on customer
for each row
begin
	if new.cus_dob >= str_to_date(current_date(), '%Y-%m-%d') then
		signal sqlstate '45000' 
        set mysql_errno = 4, message_text = 'Ngày sinh phải nhỏ hơn ngày hiện tại';
	end if;
end//
delimiter ;

delimiter //
create trigger trig_insert_room
before insert
on room
for each row
begin
	set new.r_capacity = 0;
end//
delimiter ;

delimiter //
create trigger trig_update_room
before update
on room
for each row
begin
	if exists (select tk.tk_id from ticket tk where tk.r_id = new.r_id and tk.tk_available = 1) then
		signal sqlstate '45000' 
		set mysql_errno = 14, message_text = 'Phòng không thể thay đổi sức chứa khi đang được trưng dụng';
	end if;
end//
delimiter ;

delimiter //
create trigger trig_insert_ticket
before insert
on ticket
for each row
begin
	declare loai nvarchar(20);
    declare maphong varchar(10);
    
    if new.tk_value is null then
		set new.tk_value = 0;
	end if;
    
    select st.st_type, st.r_id into loai, maphong
    from seat st
    where st.st_id = new.st_id;
    
    if exists (select tk.tk_id from ticket tk where tk.st_id = new.st_id and tk.sl_id = new.sl_id and tk.tk_available = 1) then
		signal sqlstate '45000' 
        set mysql_errno = 16, message_text = 'Ghế đã được người khác đặt';
	end if;
    
    if not exists (select st.r_id from seat st where st.st_id = new.st_id and st.r_id = new.r_id) then
		signal sqlstate '45000' 
        set mysql_errno = 17, message_text = 'Vị trí ghế không nằm ở đúng phòng';
	end if;
    
    set new.tk_type = loai;
    set new.tk_available = 1;
end//
delimiter ;

delimiter //
create trigger trig_update_ticket_type
before update
on ticket
for each row
begin
	declare loai nvarchar(20);
    
    select st.st_type into loai
    from seat st
    where st.st_id = new.st_id;
    
    set new.tk_type = loai;
end//
delimiter ;

delimiter //
create trigger trig_drop_ticket
before update
on ticket
for each row
begin
	declare makhach varchar(10);

	if new.tk_available = 0 && old.tk_available = 1 then
        
        select bi.cus_id into makhach from bill bi
		where bi.bi_id = new.bi_id;
        update customer cus
		set cus.cus_point = cus.cus_point - 30
		where cus.cus_id = makhach;
    end if;
end//
delimiter ;

delimiter //
create trigger trig_insert_bill
before insert
on bill
for each row
begin
	declare tongtien decimal(15,2);
    declare dem int;
    declare thangbill int;
    declare nambill int;
    declare manam, mathang varchar(10);
    set dem = 0, tongtien = 0;
    
    if not exists (select tk.tk_id from ticket tk
					where tk.bi_id = new.bi_id and tk.tk_available = 1) then
		signal sqlstate '45000' 
        set mysql_errno = 17, message_text = 'Không có vé nào còn khả dụng';
    end if;
    
	select count(tk.tk_id) into dem
    from ticket tk
    where tk.bi_id = new.bi_id and tk.tk_available = 1;

	select sum(tk.tk_value) into tongtien
    from ticket tk
    where tk.bi_id = new.bi_id and tk.tk_available = 1;

    set new.tk_count = dem;
    set new.bi_value = tongtien;
    set new.bi_date = now();
    
    -- cap nhat diem tich luy khach hang
    update customer cus
	set cus.cus_point = (30 * dem) + cus.cus_point
	where cus.cus_id = new.cus_id;
    
    -- cap nhat doanh thu
    set nambill = year(new.bi_date);
    set thangbill = month(new.bi_date);
    set manam = concat('YR',convert(nambill, char(10)));
    if thangbill > 9 then
		set mathang = concat('MR', convert(nambill, char(10)), convert(thangbill, char(10)));
	else
		set mathang = concat('MR', convert(nambill, char(10)), '0', convert(thangbill, char(10)));
    end if;
    
    if not exists (select * from yearlyrevenue yre where yre.yre_year = nambill) then
		insert into yearlyrevenue values (manam, nambill, dem, tongtien);
        insert into monthlyrevenue values (mathang, thangbill, manam, dem, tongtien);
	elseif not exists (select * from monthlyrevenue mre where mre.mre_month = thangbill) then
		insert into monthlyrevenue values (mathang, thangbill, manam, dem, tongtien);
        update yearlyrevenue yre
        set yre.yre_count = yre.yre_count + dem,
			yre.yre_value = yre.yre_value + tongtien
        where yre.yre_year = nambill;
	else
		update monthlyrevenue mre
        set mre.mre_count = mre.mre_count + dem,
			mre.mre_value = mre.mre_value + tongtien
        where mre.mre_yre_id = manam and mre.mre_month = thangbill;
        update yearlyrevenue yre
        set yre.yre_count = yre.yre_count + dem,
			yre.yre_value = yre.yre_value + tongtien
        where yre.yre_year = nambill;
    end if;
end//
delimiter ;

delimiter //
create trigger trig_update_bill_date
before update
on bill
for each row
begin
    if new.bi_date <> old.bi_date then
		signal sqlstate '45000' 
        set mysql_errno = 13, message_text = 'Ngày lập hóa đơn không thể được chỉnh sửa';
	end if;
end//
delimiter ;

delimiter //
create trigger trig_insert_slot
before insert
on slot
for each row
begin 
	declare thoiluong time;
    declare ngayphimketthuc date;
    select mv.mv_duration, mv.mv_end into thoiluong, ngayphimketthuc
    from movie mv
    where mv.mv_id = new.mv_id;

	if new.sl_start < str_to_date(now(), '%Y-%m-%d %T') || date(new.sl_start) > ngayphimketthuc then
		signal sqlstate '45000' 
        set mysql_errno = 5, message_text = 'Thời điểm bắt đầu suất chiếu không hợp lệ';
	end if;
    if new.sl_end < str_to_date(now(), '%Y-%m-%d %T') then
		signal sqlstate '45000' 
        set mysql_errno = 6, message_text = 'Thời điểm kết thúc suất chiếu không hợp lệ';
	end if;
    if timediff(new.sl_end, new.sl_start) <> thoiluong then
		signal sqlstate '45000' 
        set mysql_errno = 7, message_text = 'Thời lượng suất chiếu không hợp lệ';
	end if;
    set new.mv_duration = thoiluong;
    
    if new.sl_price is null then
		set new.sl_price = 0;
	end if;
end//
delimiter ;

delimiter //
create trigger trig_update_slot_start_end
before update
on slot
for each row
begin
	declare thoiluong time;
    select mv.mv_duration into thoiluong
    from movie mv
    where mv.mv_id = new.mv_id;
    

	if new.sl_start < str_to_date(now(), '%Y-%m-%d %T') then
		signal sqlstate '45000' 
        set mysql_errno = 8, message_text = 'Thời điểm bắt đầu suất chiếu không hợp lệ';
	end if;
    if new.sl_end < str_to_date(now(), '%Y-%m-%d %T') then
		signal sqlstate '45000' 
        set mysql_errno = 9, message_text = 'Thời điểm kết thúc suất chiếu không hợp lệ';
	end if;
    if timediff(new.sl_end, new.sl_start) <> thoiluong then
		signal sqlstate '45000' 
        set mysql_errno = 10, message_text = 'Thời lượng suất chiếu không hợp lệ';
	end if;
end//
delimiter ;

delimiter //
create trigger trig_insert_seat
before insert
on seat
for each row
begin
	update room r
    set r.r_capacity = r.r_capacity + 1
    where r.r_id = new.r_id;
end//
delimiter ;

delimiter //
create trigger trig_insert_discount
before insert
on discount
for each row
begin
    if new.dis_start < str_to_date(current_date(), '%Y-%m-%d') then
		signal sqlstate '45000' 
        set mysql_errno = 15, message_text = 'Ngày bắt đầu chương trình không được nhỏ hơn ngày hiện tại';
	end if;
    
    if new.dis_percent is null then
		set new.dis_percent = 0;
    end if;
end//
delimiter ;

delimiter //
create trigger trig_insert_yearlyrevenue_year
before insert
on yearlyrevenue
for each row
begin
    if new.yre_year < 1895 || new.yre_year > year(now()) then
		signal sqlstate '45000' 
        set mysql_errno = 11, message_text = 'Số năm không hợp lệ';
	end if;
end//
delimiter ;

delimiter //
create trigger trig_update_yearlyrevenue_year
before update
on yearlyrevenue
for each row
begin
    if new.yre_year < 1895 || new.yre_year > year(now()) then
		signal sqlstate '45000' 
        set mysql_errno = 12, message_text = 'Số năm không hợp lệ';
	end if;
end//
delimiter ;

