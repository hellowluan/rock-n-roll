function showAlert(icon, title, description, confirmButtonText,
  denyButtonText, redirect, redirectAlter) {
  Swal.fire({
    icon: icon,
    title: title,
    text: description,
    confirmButtonText: confirmButtonText,
    confirmButtonColor: '#3CDC8C',
    showDenyButton: true,
    denyButtonText: denyButtonText,
    denyButtonColor: '#DC3C3C'
  }).then((result) => {
    if (result.isConfirmed) {
      location.href = (redirect);
    } else {
      location.href = (redirectAlter)
    }
  })

}

function showAlertSucessTimer(title) {
  Swal.fire({
    icon: 'success',
    title: title,
    text: 'Click para continuar',
    showConfirmButton: false,
    timer: 1500
  });
}

function showAlertSucess(title, redirect, redirectAlter = redirect) {
  Swal.fire({
    icon: 'success',
    title: title,
    text: 'Click para continuar',
    showConfirmButton: true,
    showButtonText: 'OK',
  }).then((result) => {
    if (result.isConfirmed) {
      location.href = (redirect);
    } else {
      location.href = (redirectAlter);
    }
  });
}

function showAlertError(title, description, redirect, redirectAlter = redirect) {
  Swal.fire({
    icon: 'error',
    title: title,
    text: description,
    showConfirmButton: true,
    showButtonText: 'OK',
  }).then((result) => {
    if (result.isConfirmed) {
      location.href = (redirect);
    } else {
      location.href = (redirectAlter);
    }
  });
}

