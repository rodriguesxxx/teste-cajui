import { StyleSheet, Text, View } from "react-native";
import { DisciplinaType } from "./Disciplinas";

type CardDisciplinaProps = {
    disciplina: DisciplinaType;
};

export function CardDisciplina({ disciplina }: CardDisciplinaProps) {
    return (
        <View>
            <View style={styles.disciplinaHeader}>
                <Text style={styles.disciplinaHeaderText}>{disciplina.nome}</Text>
                <Text style={styles.disciplinaHeaderText}>{disciplina.professor}</Text>
            </View>
        </View>
    );
}

const styles = StyleSheet.create({
    disciplinaHeader: {
        padding: 10,
        marginBottom: 10,
        borderRadius: 1,
        elevation: 1,
    },
    disciplinaHeaderText: {
        color: "#007BFF",
        fontWeight: "bold",
    },
});
