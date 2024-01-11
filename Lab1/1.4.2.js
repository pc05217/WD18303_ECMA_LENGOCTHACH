fetch('https://65929f4fbb129707198fe18e.mockapi.io/tinhpv10/students')
    .then(function (response) {
        response.json().then(function(api2){
            // Hiển thị data
            let array = api2

            let html = document.getElementById('table2');

        
            let child_html = `<tr>`;

            for (let {id, createdAt, name, avatar} of array) {
                child_html += `<td>${id}</td>`;
                child_html += `<td>${createdAt}</td>`;
                child_html += `<td>${name}</td>`;
                child_html += `<td><img src="${avatar}" alt=""></td>`;
                
                child_html += '</tr>';
                html.innerHTML = child_html;
            }

        })
    })