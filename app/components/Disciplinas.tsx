import { FlatList } from "react-native-gesture-handler";
import { Card } from "./Card";
import { CardDisciplina } from "./CardDisciplina";

export type DisciplinaType = {
    id: string;
    nome: string;
    professor: string;
};

const disciplinas: DisciplinaType[] = [
    { id: "6638", nome: "Arquitetura e Organização de Computadores", professor: "Marco Aurelio Madureira de Carvalho" },
    { id: "6634", nome: "Lógica Matemática", professor: "Alan Teixeira de Oliveira" },
    { id: "6623", nome: "Programação e Algoritmos", professor: "Leonan Teixeira de Oliveira" },
];

export function Disciplinas() {
    return (
        <Card title='Disciplinas em curso'>
            <FlatList
                data={disciplinas}
                keyExtractor={(item) => item.id}
                renderItem={({ item }: { item: DisciplinaType }) => <CardDisciplina disciplina={item} />}
            />
        </Card>
    );
}
