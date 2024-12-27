const roleInputs = {};

function updateRoleBoxes() {
    const select = document.getElementById('selectActor');
    const selectedOptions = Array.from(select.selectedOptions);
    const roleBoxesContainer = document.getElementById('roleBoxes');

    // Sử dụng biến existingRole từ Blade
    const roles = existingRole || {};

    const roleBoxesHTML = selectedOptions.map(option => {
        const currentRole = roleInputs[option.value] || roles[option.value] || '';
        return `
            <div class="role-box">
                <label>Vai trò của ${option.text}: </label>
                <input oninput="updateRoleInput('${option.value}', this.value)" class="form-control" type="text" name="role_actor_chooses[${option.value}]" value="${currentRole}">
            </div>
        `;
    }).join('');

    roleBoxesContainer.innerHTML = roleBoxesHTML;
}

function updateRoleInput(actorId, value) {
    roleInputs[actorId] = value;
}

document.addEventListener('DOMContentLoaded', updateRoleBoxes);
