$(document).ready(
  function(e){
    var form = $('#myform');
    var message = $('#myform_status');
    form.on('submit',function(){
      var formData = new FormData();
      if(($('#myfile')[0].files).length !=0){
        $.each($('#myfile')[0].files, function(i, file){
          formData.append("file[" + i + "]", file);
        });
      }
      else{
        message.text('Нужно выбрать файл/ы');
        return false;
      }
      $.ajax({
        type:"POST",
        url:"php/uploud_foto_obl.php",
        cache:false,
        dataType:"json",
        contentType: false,
        processData: false,								
        data: formData,
      });
      return true;
    });
  }
);