function SanPham(idsanpham) {
  const url = "http://localhost:3000/products/";
  fetch(url + idsanpham).then(function (response) {
    response
      .json()
      .then(function (SanPham) {
        console.log(SanPham);
        let html = document.getElementById("container-1");
        
        let child_html = `<div class="img">
          <img class="img1" src="${SanPham.image}" alt="">
        </div>
        <div class="chu">
          <h1>${SanPham.name}</h1>
          <h2>Giá: ${SanPham.price} VNĐ</h2>
          <hr>
          <br>
          <br>
          <b>Size:</b>
          <button class="btn1" style="width: 60px; height: 30px;">36</button>
          <button class="btn1" style="width: 60px; height: 30px;">37</button>
          <button class="btn1" style="width: 60px; height: 30px;">38</button>
          <button class="btn1" style="width: 60px; height: 30px;">39</button>
          <button class="btn1" style="width: 60px; height: 30px;">40</button>
          <button class="btn1" style="width: 60px; height: 30px;">41</button>
          <br>
          <br>
          <br>
          <br>
          <b>Số Lượng:</b>
          <input style="width: 70px; height: 30px;" type="number" name="" id="" step="1"> <br> <br>
          <button style="border: none; width: 200px; 
            height: 40px; border-radius: 10px; margin-left: 10px;
            background-color: orangered; color:white; margin-top: 10px;">Thêm Vào Giỏ Hàng</button>
                    <button style="border: none; width: 200px; 
            height: 40px; border-radius: 10px; margin-left: 10px;
            background-color: rgb(49, 49, 207);"><a style="text-decoration: none; color:white;" href="thanhtoan.php">Mua
                            Ngay</a></button>
      </div>`;
        html.innerHTML = child_html;
      })
      .catch(function (error) {
        console.log(error);
      });
  });
}

const VND = new Intl.NumberFormat("vi-VN", {
  style: "currency",
  currency: "VND",
});

SanPham(1);
