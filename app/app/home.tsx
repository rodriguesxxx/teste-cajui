import { Aluno } from "@/components/Aluno";
import { Disciplinas } from "@/components/Disciplinas";
import { ScrollView } from "react-native";

export default function HomeScreen() {
    return (
        <ScrollView contentContainerStyle={{ padding: 16 }}>
            <Aluno />
            <Disciplinas />
        </ScrollView>
    );
}