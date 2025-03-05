document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    form.addEventListener('submit', function(event) {
        let valid = true;
        let messages = [];

        // Validação do campo nome
        const nome = document.querySelector('input[name="nome"]');
        nome.value = nome.value.trim();
        if (nome.value === '') {
            valid = false;
            messages.push('O campo nome é obrigatório.');
        }

        // Validação do campo email
        const email = document.querySelector('input[name="email"]');
        email.value = email.value.trim();
        const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        if (!emailPattern.test(email.value)) {
            valid = false;
            messages.push('Por favor, insira um email válido.');
        }

        // Validação do campo estado
        const estado = document.querySelector('select[name="estado"]');
        estado.value = estado.value.trim();
        if (estado.value === '') {
            valid = false;
            messages.push('O campo estado é obrigatório.');
        }

        // Validação do campo profissão
        const profissao = document.querySelector('input[name="profissao"]');
        profissao.value = profissao.value.trim();
        if (profissao.value === '') {
            valid = false;
            messages.push('O campo profissão é obrigatório.');
        }

        if (!valid) {
            event.preventDefault();
            alert(messages.join('\n'));
        }
    });
});