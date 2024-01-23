function DanhSachSanPham() {
  const url = "http://localhost:3000/products";
  fetch(url).then(function (response) {
    response
      .json()
      .then(function (dsSanPham) {
        let html = document.getElementById("product_container");
        let child_html = ``;
        dsSanPham.forEach((element) => {
          child_html += `<a href="">
            <form method="post">
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
            </form>
        </a>`;
          html.innerHTML = child_html;
        });
      })
      .catch(function (error) {
        console.log(error);
      });
  });
}
const VND = new Intl.NumberFormat('vi-VN', {
  style: 'currency',
  currency: 'VND',
});
DanhSachSanPham();
