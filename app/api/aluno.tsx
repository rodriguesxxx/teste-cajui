import api from "./api";

async function getInfoAluno() {
    return (await api.get("/aluno/perfil", {})).data;
}

async function getDisciplinas() {
    return (await api.get("/aluno/disciplinas", {})).data;
}

export { getDisciplinas, getInfoAluno };
