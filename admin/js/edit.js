let idsp = sessionStorage.getItem("id_sp");
let array = document.getElementsByTagName("input");
let [a, b, c, d] = array;

const API_URL = "http://localhost:3000/products";

axios.get(`${API_URL}/${idsp}`).then(({ data }) => {
  a.value = `${data.name}`;
  b.value = `${data.price}`;
  c.value = `${data.category_id}`;
  d.value = `${data.detail}`;
});

let checkForm = () => {
  let formElm = document.querySelector(".form");
  let inputElm = formElm.querySelectorAll(".form-input");

  for (let i = 0; i < inputElm.length; i++) {
    if (inputElm[i].value === "") {
      inputElm[i].parentElement.querySelector(".error_message").innerText = `Vui lòng nhập ${inputElm[i].placeholder}`;
    } else {
      inputElm[i].parentElement.querySelector(".error_message").innerText = "";
    }
  }
};

let edit = () => {
  checkForm();
  let formElm = document.querySelector(".form");
  let error_message = formElm.querySelectorAll(".error_message");
  let array_error = [];
  for (let i = 0; i < error_message.length; i++) {
    array_error.push(error_message[i].innerText);
  }
  let checkError = array_error.every((value) => value === "");

  if (checkError) {
    let array2 = document.getElementsByTagName("input");
    let [name, price, cate_id, detail] = array2;
    let image_1 = document.getElementById("image").value;
    let image = image_1.slice(12, 22);
    let product = {
      name: name.value,
      category_id: cate_id.value,
      price: price.value,
      detail: detail.value,
      image: "content/images/" + image,
    };

    axios.put(`${API_URL}/${idsp}`, product).then((response) => {
      sessionStorage.clear();
      window.location = "index.html";
    });
  }
};
