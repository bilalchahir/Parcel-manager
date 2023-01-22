
$(document).ready(function() {

    $("#loginForm").hide();
    $("#formButton").click(function() {
      $("#loginForm").toggle();
    });
    $("#search").click(function() {
      let timerInterval
Swal.fire({
  title: 'Auto close alert!',
  html: 'I will show the informations in <b></b> milliseconds.',
  timer: 2000,
  timerProgressBar: true,
  didOpen: () => {
    Swal.showLoading()
    const b = Swal.getHtmlContainer().querySelector('b')
    timerInterval = setInterval(() => {
      b.textContent = Swal.getTimerLeft()
    }, 100)
  },
  willClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    console.log('I was closed by the timer')
  }
})

    })
    $("#login").click(function() {
      Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'successful',
        showConfirmButton: false,
        timer: 1500
      })

    });
  });