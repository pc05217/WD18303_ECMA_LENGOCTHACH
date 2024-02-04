let sp = JSON.parse(localStorage.getItem("giohang"));

const VND = new Intl.NumberFormat("vi-VN", {
  style: "currency",
  currency: "VND",
});

let showGioHang = (sp) => { 
  let html = document.getElementById("tbody");
  let child_html = ``;
  let total = 0;
  let index = 0;
  let index2 = 0;
  
  for (let i = 0; i < sp.length; i++) {
    index2 += 1;
    index += 1;
    child_html += `<tr>
    <td class="col-md-6">
    <div class="media" >
        <a class="thumbnail pull-left" href="#"> <img class="media-object"
            src="${sp[i].image}"
            style="width: 100px; height: 100px;"> </a>
        <div class="media-body">
        <h4 style="margin-left: 4%; margin-top: 5%; color: black;"><a href="#">${
          sp[i].name
        }</a></h4>
    </div>
    </td>
    <td class="col-md-1" style="text-align: center">
    <input type="email" class="form-control" id="exampleInputEmail1" value="${Number(
      sp[i].quantity
    )}">
    </td>
    <td class="col-md-1 text-center"><strong>${VND.format(
      Number(sp[i].price)
    )}</strong></td>
    <td class="col-md-1 text-center"><strong>${VND.format(
      Number(sp[i].quantity * sp[i].price)
    )}</strong></td>
    <td class="col-md-1">
    <button type="button" class="btn btn-danger" onclick="deleteCart(${index})">
        <span class="glyphicon glyphicon-remove"></span> Xóa
    </button>
    </td>
    </tr>`;
    total += Number(sp[i].quantity * sp[i].price);
    html.innerHTML = child_html;
  }
  child_html += `<tr>
                <td>   </td>
                <td>   </td>
                <td>   </td>
                <td width="20%">
                <h3>Tổng Tiền</h3>
                </td>
                <td>
                <h3><strong>${VND.format(total)}</strong></h3>
                </td>
                </tr>
                <tr>
                <td>   </td>
                <td>   </td>
                <td>   </td>
                <td>   </td>
                <td width="20%">
                <button type="button" class="btn btn-success">
                    <a href="donhang.html" style="color: white">Thanh Toán</a>
                </button>
                </td>
                </tr>`;
  html.innerHTML = child_html;
};

var deleteCart = async (id_sp) => {
      for (let i = 0; i < sp.length; i++) {
        if (i == id_sp-1) {
            sp.splice(i, 1);
        }
      }
      let sanpham = await sp;
      await localStorage.removeItem('giohang');
      await localStorage.setItem('giohang', JSON.stringify(sanpham));
      await showGioHang(sanpham);
  };

showGioHang(sp);
