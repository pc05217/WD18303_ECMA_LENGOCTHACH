fetch('https://api.publicapis.org/entries')
    .then(function (response) {
        response.json().then(function(data){
            console.log(data.entries);
            let array = data.entries;

            let html = document.getElementById('PC05217');

            html.innerHTML = data.count;

            let child_html = `<ul><li>COUNT: <strong></strong>${data.count}</li>`;


            array.forEach(element => {
                console.log(element);
                child_html += `<li> ${element.API} </li>`;
                child_html += `<li> ${element.Description} </li>`;
                child_html += `<li> ${element.Auth} </li>`;
                child_html += `<li> ${element.HTTPS} </li>`;
                child_html += `<li> ${element.Cors} </li>`;
                child_html += `<li> ${element.Link} </li>`;
                child_html += `<li> ${element.Category} </li>`;
            });

            child_html += '</ul>';

            html.innerHTML = child_html;
        })
    })

