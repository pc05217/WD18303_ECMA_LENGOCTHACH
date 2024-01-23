const API_URL = "http://localhost:3000/products";

axios.get(API_URL).then((response) => {
  let array = response.data;
  let html = document.getElementById("table");
  let child_html = `<thead>
  <tr>
      <th style="font-weight:bold; color:white;" scope="col" style="width: 5%">ID</th>
      <th style="font-weight:bold; color:white; width:15%" scope="col">Hình ảnh</th>
      <th style="font-weight:bold; color:white; width:20%" scope="col">Sản Phẩm</th>
      <th style="font-weight:bold; color:white;" scope="col">Giá</th>
      <th style="font-weight:bold; color:white; width:15%">Thể Loại</th>
      <th style="font-weight:bold; color:white; width:20%">Chi Tiết</th>
      <th style="font-weight:bold; color:white; width:10%">Hành Động</th>
  </tr>
</thead> <tbody>`;
  array.map((element) => {
    child_html += `
    <tr style="vertical-align: middle;" data-id = '${element.id}'>`;
    child_html += `<td>
        ${element.id}
    </td>
    <td>
        <img style="width:100%;" src="${element.image}" alt="">
    </td>
    <td> 
        ${element.name}
    </td>
    <td>
        ${VND.format(element.price)}
    </td>
    <td>
        ${element.category_id}
    </td>
    <td>
        ${element.detail}
    </td>
    <td>
        <a href="edit.html" onclick="getID(${element.id})" class="edit"
            data-toggle="modal"><i class="material-icons" data-toggle="tooltip"
                title="Edit">&#xE254;</i></a>
        <a href="delete.html" onclick="getID(${element.id})" class="delete"
            data-toggle="modal"><i class="material-icons" data-toggle="tooltip"
                title="Delete">&#xE872;</i></a>
    </td>
    `;
    child_html += `</tr>`;
    html.innerHTML = child_html;
  });
    child_html+=`</tbody>`;
});

const VND = new Intl.NumberFormat('vi-VN', {
    style: 'currency',
    currency: 'VND',
  });
