


          function myFunction($id) {

            var checkBox = document.getElementById($id.value);
            var amount = document.querySelector(".amount").innerHTML;
            amount = Number(amount);
            var baseprice = parseFloat($("#baseprice").val());
          
            if($id.value.substring(0,1) == 'G')
              baseprice *= 2.2;
            else if ($id.value.substring(0,1) == "D" || $id.value.substring(0,1) == "E" || $id.value.substring(0,1) == "F")
              baseprice *= 1.5;

            if (checkBox.checked == true){
              amount += baseprice;
            } else {
              amount -= baseprice;
            }
            document.querySelector(".amount").innerHTML = amount;
          }

          $("#listslot").on("change", function(){
            $.ajax({
              type: 'GET',
              dataType: 'JSON',
              data: {},
              url: '/user/slots/getdata/' + ($("#listslot option:selected").val()),
              success: function(results){
                $slot = results.slot;
                  $('#time').html(''+ $slot.sl_start.substring(10,16) +'');
                  $('#date').html(''+ $slot.sl_start.substring(0,10) +'');
                  $('#room').html(''+ $slot.r_id +'');
                  $('#baseprice').val($slot.sl_price);
                  $('#allseat').html('' + results.allseat + '');
                  $('#hiddenslot').val($slot.sl_id);
                  $('#hiddenroom').val($slot.r_id);
              }
            });
            document.querySelector(".amount").innerHTML = 0;
          });

          $(document).ready(function(){
            $.ajax({
              type: 'GET',
              dataType: 'JSON',
              data: {},
              url: '/user/slots/getdata/' + ($("#listslot option:selected").val()),
              success: function(results){
                $slot = results.slot;
                  $('#time').html(''+ $slot.sl_start.substring(10,16) +'');
                  $('#date').html(''+ $slot.sl_start.substring(0,10) +'');
                  $('#room').html(''+ $slot.r_id +'');
                  $('#baseprice').val($slot.sl_price);
                  $('#allseat').html('' + results.allseat + '');
              }
            });
          });



