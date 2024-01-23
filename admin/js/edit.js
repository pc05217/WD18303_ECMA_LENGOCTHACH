let idsp = sessionStorage.getItem('id_sp');
let array = document.getElementsByTagName("input");
let [a, b, c, d] = array;

const API_URL = "http://localhost:3000/products";

  
axios.get(`${API_URL}/${idsp}`).then(({data}) => {
    a.value = `${data.name}`;
    b.value = `${data.price}`;
    c.value = `${data.category_id}`;
    d.value = `${data.detail}`;
});

let editSP = () =>{
    let array2 = document.getElementsByTagName("input");
    let [name, price, cate_id, detail] = array2;
    let image_1 = document.getElementById("image").value;
    let image = image_1.slice(12, 22);
    let product = {
        id: 10,
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

