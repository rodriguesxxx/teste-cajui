import api from "./api";

async function getInfoAluno() {
    return (await api.get("/perfil", {})).data;
}

async function getDisciplinas() {
    return (await api.get("/disciplinas", {})).data;
}

async function getAvaliacoes(disciplina: number) {
    return (await api.get(`/disciplinas/${disciplina}/avaliacoes`, {})).data;
}

async function getMedia(disciplina: number) {
    return (await api.get(`/disciplinas/${disciplina}/media`, {})).data;
}


export { getInfoAluno, getDisciplinas, getAvaliacoes, getMedia };
