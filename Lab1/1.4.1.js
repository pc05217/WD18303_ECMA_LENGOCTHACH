fetch('https://datausa.io/api/data?drilldowns=Nation&measures=Population')
    .then(function (response) {
        response.json().then(function(dt){
            // Hiển thị data
            let array = dt.data;

            let html = document.getElementById('table');

        
            let child_html = `<tr>`;

            for (let{Nation,Year, Population} of array) {
                child_html += `<td>${Nation}</td>`;
                child_html += `<td>${Year}</td>`;
                child_html += `<td>${Population}</td>`;
                child_html += '</tr>';
                html.innerHTML = child_html;
            }
        })
    })