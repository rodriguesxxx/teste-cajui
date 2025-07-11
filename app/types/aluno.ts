export type InfoAlunoType = {
    id: number;
    nome: string;
    email: string;
    matricula: string;
    foto: string;
};

export type DisciplinaType = {
    id: number;
    nome: string;
    professor: string;
    curso: string;
    ementa: string;
    periodo: number;
    carga_horaria: number;
};

export type AvaliacoesType = {
    id: number;
    titulo: string;
    data: string;
    nota_maxima: number;
    nota: number;
};

export type MediaType = {
    media: number;
};
