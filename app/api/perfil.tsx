import api from "./api";

async function getInfoAluno() {
    return (await api.get("/aluno/perfil", {})).data;
}

export { getInfoAluno };
