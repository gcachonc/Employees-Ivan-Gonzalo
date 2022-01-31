const deleteBtns = document.querySelectorAll(".deleteBtn");

deleteBtns.forEach(btn => {
    btn.addEventListener("click", () => {
        const id = btn.dataset.id;

        const confirm = window.confirm("Are you sure you want to delete the employee?");

        if(confirm) {

            httpRequest(`http://localhost/Assembler/Employees-Ivan-Gonzalo/employee/deleteEmployee/${id}`)

            const row = document.querySelector(`#row-${id}`);
            const table = row.parentElement;
            row.remove();
            const confirmation = document.createElement('p');
            confirmation.innerText = "Alumno eliminado con exito";
            table.appendChild(confirmation)
            setTimeout(() => {
                confirmation.remove();
            }, 3000)

        }
    })
})

function httpRequest(url) {
    fetch(url)
    .then(res => res.text())
    //.then(data => console.log(data))
}