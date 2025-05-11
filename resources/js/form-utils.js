export function preventDoubleSubmit(form) {
  const button = form.querySelector('button[type="submit"]');
  if (button) {
    button.disabled = true;
    button.innerText = 'Enviando...';
  }
}