<!-- Common Javascript -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="assets/plugins/jquery/jquery-3.5.1.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/plugins/tags-input/bootstrap-tagsinput.js"></script>
<script src="assets/plugins/simplebar/simplebar.min.js"></script>
<script src="assets/plugins/jquery-zoom/jquery.zoom.min.js"></script>
<script src="assets/plugins/slick/slick.min.js"></script>

<!-- Data Tables -->
<script src='assets/plugins/data-tables/jquery.datatables.min.js'></script>
<script src='assets/plugins/data-tables/datatables.bootstrap5.min.js'></script>
<script src='assets/plugins/data-tables/datatables.responsive.min.js'></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Option Switcher -->
<script src="assets/plugins/options-sidebar/optionswitcher.js"></script>

<!-- Ekka Custom -->
<script src="assets/js/ekka.js"></script>
<!-- SweetAlert2 -->
<script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="../../plugins/toastr/toastr.min.js"></script>























<script>
// function for printing the graping the error and printing it
var keyarr=[]
function printErrorMsg (msg) {
 keyarr=[];
var i=0;
            $.each( msg, function( key, value ) {
            console.log(key);
            keyarr[i]=key;
            console.log(keyarr[i]);
            i++;

              $('.'+key+'_err').text(value);
            });
        }
// function of deleting data after adding it
        function deleteDataCategory(data) {
            $.each( data, function( key,value) {
            console.log(key);
            console.log("samouhi");

            $('#'+key).val("");
            if(key=="sex"){
              $('#'+value).prop("checked", false );
              $('.'+value).removeClass("active");
            }
            if(key=="nationality"){
              $('.select'+key+' select').each( function() {
        $(this).val( $(this).find("option[selected]").val() );
    });
            }
            });
        }



        function deleteDataSubCategory(data) {
            $.each( data[0], function( key,value) {
            console.log(key);
            $('#'+key).val("");
            if(key=="category_id"|| key=="subCategory_id"){
              $('.'+key+' select').each( function() {
        $(this).val( $(this).find("option[selected]").val() );
    });
            }
            });
        }


        function deleteProductInput(data) {
            $.each( data[0], function( key,value) {
            $('.'+key).val("");
            if(key=="size"){
            $('.'+key).prop('checked', false);
            }
            if(key=="image"){
            jQuery('.image_main').attr('src', 'assets/img/products/vender-upload-preview.jpg');
            jQuery('.image').attr('src', 'assets/img/products/vender-upload-thumb-preview.jpg');
            }
            if(key=="subCategory_id"){
              $('.'+key+' select').each( function() {
        $(this).val( $(this).find("option[selected]").val() );
    });
            }
            });
            for(i=counter_size;i!=0;i--){
            $("#size"+i).remove();
            if(i==1){
            $( "#showLessSize").addClass("d-none");
            }
    }
    for(i=counter_sizeE;i!=0;i--){
            $("#size"+i).remove();
            if(i==1){
            $("#showLessSizeE").addClass("d-none")
    }
}
        }





        // function for deleting the error msg
        function deleteErrorMsg () {
       for(var i=0 ; i<keyarr.length ;i++)
              $('.'+keyarr[i]+'_err').text("");

        }
//function for alert sucess
      function  alertSucces( icon1 ,title1){
        $(function () {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
           Toast.fire({
        icon: icon1,
        title: title1
      })
      });
    }
</script>
