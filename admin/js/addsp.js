let addsp = () => {
    let array = document.getElementsByTagName("input");
    let [name, price, cate_id, detail] = array;
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
  
    const API_URL = "http://localhost:3000/products";
  
    axios.post(API_URL, product).then((response) => {
      window.location = "index.html";
    });
};
