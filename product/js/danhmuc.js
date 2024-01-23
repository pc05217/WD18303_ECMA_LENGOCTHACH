const API_URL = "http://localhost:3000/categories";
axios.get(API_URL).then((response) => {
  let array = response.data;
  let html = document.getElementById("btn_dm");
  let child_html = ``;
  array.map((element) => {
    child_html += `<button onclick="loc(${element.id})">${element.name}</button>`;
    html.innerHTML = child_html;
  });
});

let loc = (id) => {
  const API_Product = "http://localhost:3000/products";
  axios.get(API_Product).then((dssp) => {
    let arry2 = dssp.data
    let dm = document.getElementById("product_container");
    let child_dm = ``;
    arry2.map((dt) => {
        if(dt.category_id === id){
            child_dm += `<a href="">
            <form method="post">
                <figure>
                    <div class="box">
                        <div class="box-content">
                            <div class="img-box">
                                <img src="${dt.image}" alt="">
                            </div>
                            <div class="detail-box" style="text-align: center;">
                                <h3 style="color: red">
                                ${dt.name}
                                </h3>
                                <h5>
                                    <span>${VND.format(dt.price)}</span>
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
        dm.innerHTML = child_dm;
        }
    })
  });
};
const VND = new Intl.NumberFormat('vi-VN', {
  style: 'currency',
  currency: 'VND',
});
