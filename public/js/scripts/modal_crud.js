$(document).ready(function () {
    $('a[is-modal]').on('click',function (e) {
        $('#contentModal').load(this.href,function() {
            $('#myModalGeneric').modal({keyboard:true},'show');
            crud_modal_ajax();
        });
        return false;
    });

    $('#myModalGeneric').on('hidden.bs.modal',function (e) {
        $('#contentModal').html('');
    });
});

function crud_modal_ajax() {
    $('#myFrom').submit(function (e) {
        e.preventDefault();

        let form=$(this);
        form.ajaxSubmit({
            dataType:'JSON',
            type:'POST',
            url:form.attr('action'),
            success:function (response) {
                console.log(response);
                switch (response.success) {
                    case 1:
                        Swal.fire({
                            title: '!Bien¡',
                            text: response.messege,
                            icon: 'success',
                            showConfirmButton:true,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Aceptar',
                            timer:1500
                          }).then((result) => {
                            location.href=response.redirection;
                          });
                        break;
                
                    case 0:
                        console.log('Error al registrar!!');
                        break;

                    case -1:
                        let errors=Object.values(response.messege);
                        let list='<ul class="list-inline " >';
                        for (let i = 0; i < errors.length; i++) {
                            list +='<li class="text-danger ">'+errors[i]+'</li>';
                            
                        }
                        list +='</ul>';
                        $('#error_messages').html(list);
                        //document.getElementById('error_messeges').innerHTML=list;
                        break;
                }
            },
            error:function (jqXHR,textStatus,errorThrown) {
                console.log(errorThrown+'\n'+textStatus+'\n'+jqXHR.responseText);
            }
        });

    });
    
}

function remove(e) {
    let action=e.getAttribute('my-action');
    let item=e.getAttribute('item');

    Swal.fire({
        title: 'Eliminar',
        text: "Estas seguro de eliminar el registro: "+item,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si, eliminalo!'
      }).then((result) => {
        if (result.value) {
            $.ajax({
                url: action,
                async: true,
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    console.log(response)
                    if (response.success) {
                        
                        Swal.fire({
                            title: '!Eliminado',
                            text: response.messege,
                            icon: 'success',
                            showConfirmButton:true,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Aceptar',
                            timer:2500
                          }).then((result) => {
                            location.href=response.redirection;
                          })
                    }else {
                        console.log('Algo salio mal!!')
                    }
                },
                error:function (jqXHR,textStatus,errorThrown) {
                    console.log(errorThrown+'\n'+textStatus+'\n'+jqXHR.responseText);
                }

            });
        }
      })
}


function crud_modal_ajax_js() {
    const form=document.querySelector('#myFrom');

    form.addEventListener('submit',function (e) {
        e.preventDefault();
        let obj = {
            companyname: document.getElementById('company').value,
            phone: document.getElementById('phone').value,
            status: document.getElementById('status').value,
        }

        const xhttp=new XMLHttpRequest();
        xhttp.open('POST','http://localhost:84/MiWeb/shipper/prueba',true);
        xhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
        xhttp.onload=function () {
            if (this.readyState===4 & this.status===200) {
                const rpta=JSON.parse(this.responseText);
                console.log(rpta);
                
            }
        }
        xhttp.send('datos='+JSON.stringify(obj));
    });
    
}
