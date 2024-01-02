$(function(){
  // Custom confirmation for deleting
  $(document).on('click', '#delete', function(e){
      e.preventDefault();
      var link = $(this).attr("href");

      Swal.fire({
          title: 'Delete this data?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          cancelButtonText: 'Cancel',
          confirmButtonColor: '#5864dc',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
          if (result.isConfirmed) {
              window.location.href = link;
              Swal.fire(
                  'Deleted!',
                  'The data has been deleted.',
                  'success'
              );
          }
      });
  });

  // Custom confirmation for restoring
  $(document).on('click', '#restore', function(e){
      e.preventDefault();
      var link = $(this).attr("href");

      Swal.fire({
          title: 'Restore this data?',
          text: "This will restore the data to its original state.",
          icon: 'question',
          showCancelButton: true,
          cancelButtonText: 'Cancel',
          confirmButtonColor: '#5864dc',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, restore it!'
      }).then((result) => {
          if (result.isConfirmed) {
              window.location.href = link;
              Swal.fire(
                  'Restored!',
                  'The data has been restored.',
                  'success'
              );
          }
      });
  });

  // Add another custom confirmation for archiving
  $(document).on('click', '#archive', function(e){
      e.preventDefault();
      var link = $(this).attr("href");

      Swal.fire({
          title: 'Archive this data?',
          text: "This will move the data to the archive.",
          icon: 'question',
          showCancelButton: true,
          cancelButtonText: 'Cancel',
          confirmButtonColor: '#5864dc', 
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, archive it!'
      }).then((result) => {
          if (result.isConfirmed) {
              window.location.href = link;
              Swal.fire(
                  'Archived!',
                  'The data has been archived.',
                  'success'
              );
          }
      });
  });
});
