const btn=document.getElementById("download")

/*function downloadPDF(){
        const element=document.getElementById("container");
        var opt = {
            margin:       1,
            filename:     'application.pdf',
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 2 },
            jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
        };
        html2pdf().from(element).set(opt).save();
}*/

const toPDF = function (container) {
    const html_code=`
    <link rel="stylesheet" href="regis.css">
    <div class="table" >${container.innerHTML}</div>
    `;
    const new_window= window.open();
    new_window.document.write(html_code);
    setTimeout(() => {
    new_window.print();
    new_window.print();
    }, 200);
    }

btn.addEventListener('click',()=>{
    toPDF(document.getElementById("container"));
});