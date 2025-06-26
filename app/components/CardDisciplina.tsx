import { DisciplinaType } from "@/types/aluno";
import { MaterialIcons } from "@expo/vector-icons";
import { useState } from "react";
import { StyleSheet, Text, TouchableOpacity, View } from "react-native";
import { TabelaAvaliacoes } from "./TabelaAvaliacoes";

type CardDisciplinaProps = {
    disciplina: DisciplinaType;
};

export function CardDisciplina({ disciplina }: CardDisciplinaProps) {
    const [expanded, setExpanded] = useState(false);

    return (
        <View style={styles.card}>
            <TouchableOpacity onPress={() => setExpanded(!expanded)}>
                <View style={styles.disciplinaHeader}>
                    <Text style={styles.disciplinaHeaderText}>{disciplina.nome}</Text>
                    <Text style={styles.disciplinaHeaderText}>{disciplina.professor}</Text>
                </View>
            </TouchableOpacity>

            {expanded && (
                <View style={styles.detailsContainer}>
                    <TouchableOpacity
                        style={styles.ementaButton}
                        onPress={() => {
                            /* abrir ementa */
                        }}>
                        <MaterialIcons name='description' size={16} color='#fff' style={{ marginRight: 6 }} />
                        <Text style={styles.ementaButtonText}>Informações</Text>
                    </TouchableOpacity>
                    <Text style={styles.sectionTitle}>Avaliações:</Text>
                    <TabelaAvaliacoes disciplina={disciplina.id} />
                </View>
            )}
        </View>
    );
}

const styles = StyleSheet.create({
    card: {
        backgroundColor: "#fff",
        marginBottom: 12,
        borderRadius: 8,
        padding: 10,
        elevation: 2,
    },
    disciplinaHeader: {
        padding: 10,
    },
    disciplinaHeaderText: {
        color: "#007BFF",
        fontWeight: "bold",
        fontSize: 16,
    },
    detailsContainer: {
        marginTop: 10,
        borderTopWidth: 1,
        borderTopColor: "#ccc",
        paddingTop: 10,
    },
    ementaButton: {
        backgroundColor: "#00AEEF",
        paddingVertical: 6,
        paddingHorizontal: 12,
        borderRadius: 4,
        alignSelf: "flex-start",
        marginLeft: 10,
        marginBottom: 10,
        flexDirection: "row",
        alignItems: "center",
    },
    ementaButtonText: {
        color: "#fff",
        fontWeight: "bold",
        fontSize: 14,
    },

    sectionTitle: {
        fontWeight: "bold",
        marginTop: 8,
        marginBottom: 4,
    },
    avaliacaoItem: {
        marginBottom: 6,
    },
    table: {
        borderWidth: 1,
        borderColor: "#ddd",
        borderRadius: 4,
    },
    tableRow: {
        flexDirection: "row",
        borderBottomWidth: 1,
        borderColor: "#ddd",
    },
    tableHeader: {
        backgroundColor: "#f5f5f5",
    },
    tableFooter: {
        backgroundColor: "#fff6cc",
    },
    cell: {
        padding: 6,
        fontSize: 13,
        borderRightWidth: 1,
        borderColor: "#ddd",
    },
    col0: { flex: 0.5, textAlign: "center" },
    col1: { flex: 2 },
    col2: { flex: 1.2 },
    col3: { flex: 1, textAlign: "center" },
    col4: { flex: 0.8, textAlign: "center" },
});
