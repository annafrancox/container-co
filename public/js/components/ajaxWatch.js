(function( $ ){
    $.fn.ajaxWatch = function(element, success = false, func = null, validation = false, reloadIDs, html = null, closest = false, find = false, funcAction = null, reloading = false,  ) {
        $(this).on('submit', element, function(event) {
            event.preventDefault(); // impedir o submit normal
            var form = $(this);
            var url = form.attr('action');

            $(document).find("span.text-danger").remove();
            $.ajax({
                type: "POST",
                url: url,
                data:  form.serialize(),
                success: function(data)
                {
                    if(html != null){
                        if(closest){
                            form.closest(html).append(data);
                        } else if(find){
                            form.find(html).append(data);
                        } else{
                            html.append(data);
                        }
                    }
        
                    if(!reloading){
                        // if(reloadIDs != null){
                        //     reloadIDs.forEach(function(element){
                        //         $(element).load(location.href + " "+  element + ">*", "");
                        //     });
                        // }
                    } else{
                        location.reload(); 
                    }
                    if(success){
                        Toast.fire({
                            icon: 'success',
                            title: 'Operação concluida com sucesso'
                        })
                    }

                    if(func != null){
                        func();
                    }

                },

                error: function (response){
                   
                    if(validation){
                        $erroStr = '';
                        $.each(response.responseJSON.errors, function(field_name, error){
                            $erroStr += " " + error + "\n";
                        });

                        Toast.fire({
                            icon: 'error',
                            title: $erroStr
                        })
                    }
                },

                // beforeSend: function() { 
                //     $('#loading').removeClass('d-none'); 
                //     $('#load-save-button').addClass('d-none'); 
                // },

                // complete: function(){
                //     $('#loading').addClass('d-none'); 
                //     $('#load-save-button').removeClass('d-none'); 
                // },

            }).done(function(){
                
                if(funcAction != null){
                    funcAction(form);
                }
            });
        });
       return this;
    }; 
 }) ( jQuery );