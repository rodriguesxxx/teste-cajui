import { getDisciplinas } from "@/api/aluno";
import { DisciplinaType } from "@/types/aluno";
import { useEffect, useState } from "react";
import { FlatList } from "react-native-gesture-handler";
import { Card } from "./Card";
import { CardDisciplina } from "./CardDisciplina";
import Toast from "react-native-toast-message";

export function Disciplinas() {
    const [disciplinas, setDisciplinas] = useState<DisciplinaType[]>([]);

    useEffect(() => {
        const fetchDisciplinas = async () => {
            try {
                const response = await getDisciplinas();
                setDisciplinas(response.data);
            } catch (e) {
                Toast.show({
                    type: "error",
                    text1: "Erro ao carregar informações das disciplinas",
                });
            }
        };

        fetchDisciplinas();
    }, []);

    return (
        <Card title='Disciplinas em curso'>
            <FlatList
                data={disciplinas}
                keyExtractor={(item) => item.id.toString()}
                renderItem={({ item }: { item: DisciplinaType }) => <CardDisciplina disciplina={item} />}
                contentContainerStyle={{ paddingBottom: 16 }}
                scrollEnabled={false}
                nestedScrollEnabled={true}
            />
        </Card>
    );
}
