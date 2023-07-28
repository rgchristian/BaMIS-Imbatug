$(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: 'Delete this data?',
                    textSize: 12,
                    icon: 'warning',
                    showCancelButton: true,
                    cancelButtonText: 'No',
                    confirmButtonColor: '#5864dc',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Deleted!',
                        'The data has been deleted.',
                        'success'
                      )
                    }
                  }) 


    });

  });