const API_URL = "http://localhost:3000/orders";

axios.get(API_URL).then((response) => {
    let array = response.data;
    let html = document.getElementById("table");
    let child_html = `<thead>
    <tr>
        <th style="font-weight:bold; color:white;" scope="col" style="width: 5%">ID</th>
        <th style="font-weight:bold; color:white; width:20%" scope="col">Họ và Tên</th>
        <th style="font-weight:bold; color:white; width:20%" scope="col">Email</th>
        <th style="font-weight:bold; color:white;" scope="col" width:10%">Số điện Thoại</th>
        <th style="font-weight:bold; color:white; width:20%">Địa Chỉ</th>
        <th style="font-weight:bold; color:white; width:10%">Trạng Thái</th>
        <th style="font-weight:bold; color:white; width:10%">Ngày Đặt Hàng</th>
        <th style="font-weight:bold; color:white; width:10%">Hành Động</th>
    </tr>
  </thead> <tbody>`;
    array.map((element) => {
      child_html += `
      <tr style="vertical-align: middle;">`;
      child_html += `<td>
          ${element.id}
      </td>
      <td>
          ${element.customer_name}
      </td>
      <td> 
          ${element.customer_email}
      </td>
      <td>
          ${element.customer_phone_number}
      </td>
      <td>
          ${element.customer_address}
      </td>
      <td>
          ${element.status}
      </td>
      <td>
          ${element.created_date}
      </td>
      <td>
          <a href="edit_order.html" onclick="getID(${element.id})" class="edit"
              data-toggle="modal"><i class="material-icons" data-toggle="tooltip"
                  title="Edit">&#xE254;</i></a>
          <a href="order.html" onclick="deleteOrder(${element.id})" class="delete"
              data-toggle="modal"><i class="material-icons" data-toggle="tooltip"
                  title="Delete">&#xE872;</i></a>
      </td>
      `;
      child_html += `</tr>`;
      html.innerHTML = child_html;
    });
      child_html+=`</tbody>`;
  });