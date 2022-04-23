const openBtn = document.getElementById('openBtn');
const closeBtn = document.getElementById('closeBtn');
const modal = document.getElementById('modal');
openBtn.addEventListener('click', () => {
  modal.style.display = 'block';
})
closeBtn.addEventListener('click', () => {
  modal.style.display = 'none';
})
window.addEventListener('click', (e) => {
  if (!e.target.closest('.modal__content-inner') && e.target.id !== "openBtn") {
    modal.style.display = 'none';
  }
});




// function send() {
//   document.setting_form1.submit();
//   document.setting_form2.submit();
//   document.setting_form3.submit();
//   document.setting_form4.submit();
//   document.setting_form5.submit();
// };


// const open_update = document.getElementById('open_update');
// const modal2 = document.getElementById('modal2');
// open_update.addEventListener('click', () => {
//   modal2.style.display = 'block';
// })
// window.addEventListener('click', (e) => {
//   if (!e.target.closest('.modal__content-inner2') && e.target.id !== "open_update") {
//     modal2.style.display = 'none';
//   }
// });
