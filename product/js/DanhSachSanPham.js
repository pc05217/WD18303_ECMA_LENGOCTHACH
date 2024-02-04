function DanhSachSanPham() {
  const url = "http://localhost:3000/products";
  fetch(url).then(function (response) {
    response
      .json()
      .then(function (dsSanPham) {
        let html = document.getElementById("product_container");
        let child_html = ``;
        dsSanPham.forEach((element) => {
          child_html += `<a href="product_detail.html" onclick="getID(${element.id})">
            <div>
                <figure>
                    <div class="box">
                        <div class="box-content">
                            <div class="img-box">
                                <img src="${element.image}" alt="">
                            </div>
                            <div class="detail-box" style="text-align: center;">
                                <h3 style="color: red">
                                ${element.name}
                                </h3>
                                <h5>
                                    <span>${VND.format(element.price)}</span>
                                </h5>
                            </div>
                            <div class="btn-box">
                                <button class="btn-mua">
                                    Mua Ngay
                                </button>
                            </div>
                        </div>
                    </div>
                </figure>
            </div>
            </a>`;
          html.innerHTML = child_html;
        });
      })
      .catch(function (error) {
        console.log(error);
      });
  });
}

DanhSachSanPham();

let giohang = [];

let loadGioHang = async () =>{
  let cart = await JSON.parse(localStorage.getItem('giohang'))
  if(cart != null){
      giohang = cart;
  }else{
      giohang = [];
  }
}

let themvaogiohang = async (idd) =>{
  const API_URL = "http://localhost:3000/products";
  let quantity = document.getElementById('soluong').value;
  await axios.get(`${API_URL}/${idd}`).then( (element) =>{
      let e = element.data;
      let products = {
          "id": e.id,
          "name": e.name,
          "price": e.price,
          "quantity": quantity,
          "image": e.image
        } 
      giohang.push(products); 
      let addSP = localStorage.setItem('giohang', JSON.stringify(giohang)); 
      alert('Đã Thêm Vào Giỏ Hàng');
  } )
}



