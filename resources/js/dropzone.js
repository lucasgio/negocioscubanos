const { default: axios } = require("axios");

document.addEventListener('DOMContentLoaded', ( ) =>{


    if (document.querySelector('#dropzone')) {
        
        Dropzone.autoDiscover = false;

        const dropzone = new Dropzone('div#dropzone',{

            url: '/imagenes/store',
            dictDefaultMessage: 'Sube hasta 5 imagenes',
            maxFiles: 5,
            maxFilesize:2000,
            addRemoveLinks:true,
            required: true,
            dictRemoveFile:'Eliminar Imagen',
            acceptedFiles: '.jpg,.png',
            headers:{
                'X-CSRF-TOKEN':document.querySelector('meta[name=csrf-token]').content
            },
            success:function (file,resp) { 

                console.log(file);
                file.nombreServidor = resp.archivo;

            },
            sending:function (file,xhr,formData) { 
                formData.append('uuid',document.querySelector('#uuid').value);
            },
            removedfile:function(file,resp){
                console.log(file);

                const params = {
                    imagen:file.nombreServidor
                }

                axios.post('/imagenes/destroy',params)
                     .then(resp=>{
                        file.previewElement.parentNode.removeChild(file.previewElement);
                     })
                     .catch(err=>{
                        console.log(err);
                     });
            }

        });

    }

























});