var data = [];
var copydata = [];


async function getData() {
    data = await fetch('http://localhost/webFerreteria/usuarios/getUsuariosJSON')
        .then(res => res.json())
        .then(json => json);
    this.copydata = [...this.data];
    console.table(data);
    renderData(data);
}
getData();

function renderData(data) {
    var databody = document.querySelector('#databody');
    let total = 0;
    databody.innerHTML = '';
    data.forEach(item => {

        if (item.estado == 1) {
            var estado = '<span class="badge bg-success">Activo</span>'
                //item.estado = 'Activo';
        } else {
            var estado = '<span class="badge bg-danger">Inactivo</span>'
                //item.estado = 'Inactivo';
        }
        //total += item.amount;
        databody.innerHTML += `<tr>
        <td>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="customCheck2">
                <label class="form-check-label" for="customCheck2">&nbsp;</label>
            </div>
        </td>
        <td>
            ${item.id}
        </td>
        <td>
            ${item.username}
        </td>
        <td>
            ${item.fullname}
        </td>
        <td>
            ${item.email}
        </td>
            
        <td>
            ${item.role}
        </td>
        <td>
            ${estado}
        </td>

        <td class="table-action">
            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
            <a href="http://localhost/webFerreteria/usuarios/delete/${item.id}" class="action-icon"> <i class="mdi mdi-delete"></i></a>
        </td>
    </tr>`;
    });
}