// fonctionne 





// blade user EDIT: 
// (le changement d'avatar pendant la modif)

$(function(){
    const selectAvatar = document.querySelector('#selavatar'); 
    let currentImg = document.querySelector('#imgavth'); 

    if(selectAvatar){
        $(selectAvatar).on('change', function(){
            let link = window.location.pathname; // '/admin/user/3/edit'; 
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.get({
                url: '/admin/showavatar/'+selectAvatar.value,
                data: { 
                    "id": selectAvatar.value,
                    "_token": "{{ csrf_token() }}",
                },
                success: function (data){
                    console.log(data);
                    //console.log(window.location.pathname);
                    $("#avimg").html(data);
                },
                error: function (data){
                    console.log(data);
                }
            })
        });
        // selectAvatar.addEventListener("change", () => {
        //     let newimg = selectAvatar.value; 
        //     $.post()
        // });     
    }
}); 
