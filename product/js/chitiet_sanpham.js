function SanPham(id_sp) {
  const url = "http://localhost:3000/products/";
  fetch(url + id_sp).then(function (response) {
    response
      .json()
      .then(function (SanPham) {
        let html = document.getElementById("container-1");
        
        let child_html = `<div class="img">
          <img class="img1" src="${SanPham.image}" alt="">
        </div>
        <div class="chu">
          <h1>${SanPham.name}</h1>
          <h2>Giá: ${VND.format(SanPham.price)}</h2>
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
          <input style="width: 70px; height: 30px;" type="number" value="1" id="soluong" step="1"> <br> <br>
          <button style="border: none; width: 200px; 
            height: 40px; border-radius: 10px; margin-left: 10px;
            background-color: orangered; color:white; margin-top: 10px;" onclick="themvaogiohang(${SanPham.id})">Thêm Vào Giỏ Hàng</button>
                    <button style="border: none; width: 200px; 
            height: 40px; border-radius: 10px; margin-left: 10px;
            background-color: rgb(49, 49, 207);"><a style="text-decoration: none; color:white;" href="">Mua
                            Ngay</a></button>
      </div>`;
        html.innerHTML = child_html;
      })
      .catch(function (error) {
        console.log(error);
      });
  });
}

let showDetailSanPham = async ()  =>{
    let ID = await sessionStorage.getItem('id');
    await SanPham(ID);
}

showDetailSanPham();







