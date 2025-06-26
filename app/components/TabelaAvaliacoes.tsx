import { AvaliacoesType } from "@/types/aluno";
import React from "react";
import { StyleSheet, Text, View } from "react-native";

const avaliacoes: AvaliacoesType[] = [
    { id: 1, titulo: "Teste", data: "22/10/21", notaMaxima: 20, nota: 20 },
    { id: 1, titulo: "Teste 2", data: "23/10/21", notaMaxima: 20, nota: 15 },
];

type Props = {
    disciplina: number;
};

export function TabelaAvaliacoes({ disciplina }: Props) {
    return (
        <View style={styles.table}>
            <View style={[styles.tableRow, styles.tableHeader]}>
                <Text style={[styles.cell, styles.col0]}>#</Text>
                <Text style={[styles.cell, styles.col1]}>Avaliação</Text>
                <Text style={[styles.cell, styles.col2]}>Data</Text>
                <Text style={[styles.cell, styles.col3]}>Max. Pontos</Text>
                <Text style={[styles.cell, styles.col4]}>Nota</Text>
            </View>

            {avaliacoes.map((avaliacao, index) => (
                <View key={index} style={styles.tableRow}>
                    <Text style={[styles.cell, styles.col0]}>{index + 1}</Text>
                    <Text style={[styles.cell, styles.col1]}>{avaliacao.titulo}</Text>
                    <Text style={[styles.cell, styles.col2]}>{avaliacao.data}</Text>
                    <Text style={[styles.cell, styles.col3]}>{avaliacao.notaMaxima}</Text>
                    <Text style={[styles.cell, styles.col4]}>{avaliacao.nota}</Text>
                </View>
            ))}

            <View style={[styles.tableRow, styles.tableFooter]}>
                <Text style={[styles.cell, styles.col0]}></Text>
                <Text style={[styles.cell, styles.col1]}></Text>
                <Text style={[styles.cell, styles.col2]}></Text>
                <Text style={[styles.cell, styles.col3]}>30</Text>
                <Text style={[styles.cell, styles.col4]}>30</Text>
            </View>
        </View>
    );
}

const styles = StyleSheet.create({
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
