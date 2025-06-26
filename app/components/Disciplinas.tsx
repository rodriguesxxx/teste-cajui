import { getDisciplinas } from "@/api/aluno";
import { DisciplinaType } from "@/types/aluno";
import { useEffect, useState } from "react";
import { Alert } from "react-native";
import { FlatList } from "react-native-gesture-handler";
import { Card } from "./Card";
import { CardDisciplina } from "./CardDisciplina";

export function Disciplinas() {
    const [disciplinas, setDisciplinas] = useState<DisciplinaType[]>([]);

    useEffect(() => {
        const fetchDisciplinas = async () => {
            try {
                const response = await getDisciplinas();
                setDisciplinas(response.data);
            } catch (e) {
                // Alert.alert("Erro", "Não foi possível carregar as disciplinas.");
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
