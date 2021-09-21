
   window.addEventListener('load', function(){
    const url = "http://127.0.0.1:8000/";
    
    const form = document.getElementById('formShort');
    console.log(form)
    form.addEventListener('submit', function(e) {
        // evito que propague el submit
        e.preventDefault();
        
        // agrego la data del form a formData
        var formData = new FormData(this);
        formData.append('to_url', $('input[name=to_url]').val());
      
        $.ajax({
            type:'POST',
            url: url + "create",
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                
                location.reload();

            },
            error: function(jqXHR, text, error){
                console.log(error)
            }
        });
      });
   })