// fonctionne 





// blade user EDIT: 
// (le changement d'avatar pendant la modif)

$(function(){
    const selectAvatar = document.querySelector('#selavatar'); 
    let currentImg = document.querySelector('#imgavth'); 

    if(selectAvatar){
        $(selectAvatar).on('change', function(){
            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            //     }
            // });
            
            //console.log(selectAvatar.value);

            $.post({
                //url: "{{ route('admin.user.edit', $user->id) }}",
                data: selectAvatar.value,
                success: function (data){
                    console.log(data);
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
