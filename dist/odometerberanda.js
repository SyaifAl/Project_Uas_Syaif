const odoGunung = document.querySelector("#jml-gunung");
const odoJalur = document.querySelector("#jml-jalur");
const odoPendaki = document.querySelector("#jml-pendaki");

const odometer = new Odometer({
  el: odoGunung,
});
const odometer2 = new Odometer({
  el: odoJalur,
});
const odometer3 = new Odometer({
  el: odoPendaki,
});

setTimeout(function () {
  odoGunung.innerHTML = 20;
});
setTimeout(function () {
  odoJalur.innerHTML = 75;
});
setTimeout(function () {
  odoPendaki.innerHTML = 17;
});
