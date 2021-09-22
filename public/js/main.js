
   window.addEventListener('load', function(){
    const url = "http://127.0.0.1:8000/";
    
    const form = document.getElementById('formShort');
   
    var checkbox  = document.getElementById('nsfw');
    checkbox.addEventListener("change", validaCheckbox, false);
    function validaCheckbox()
    {
      var checked = checkbox.checked;
      if(checked){
        checkbox.value = 1;
      }

    }

    form.addEventListener('submit', function(e) {
        
        e.preventDefault();
        
     
        var formData = new FormData(this);
        formData.append('to_url', $('input[name=to_url]').val());
        formData.append('nsfw', $('input[name=nsfw]').val());
        
        $.ajax({
            type:'POST',
            url: url + "create",
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                console.log(formData)
                location.reload();

            },
            error: function(jqXHR, text, error){
                console.log(error)
                location.reload();
            }
        });
      });
   })