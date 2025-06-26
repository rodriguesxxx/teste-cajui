import { getAvaliacoes } from "@/api/aluno";
import { AvaliacoesType } from "@/types/aluno";
import { sumField } from "@/utils/calcUtils";
import { formatDate, formatDecimal } from "@/utils/formatUtils";
import { useQuery } from "@tanstack/react-query";
import React from "react";
import { StyleSheet, Text, View } from "react-native";

type Props = {
    disciplina: number;
};

export function TabelaAvaliacoes({ disciplina }: Props) {
    const { data: avaliacoes = [] } = useQuery<AvaliacoesType[]>({
        queryKey: ["avaliacoes", disciplina],
        queryFn: () => getAvaliacoes(disciplina).then((r) => r.data),
        staleTime: Infinity,
    });

    const totalNotaMaxima = sumField(avaliacoes, "nota_maxima");
    const totalNota = sumField(avaliacoes, "nota");

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
                    <Text style={[styles.cell, styles.col2]}>{formatDate(avaliacao.data)}</Text>
                    <Text style={[styles.cell, styles.col3]}>{formatDecimal(avaliacao.nota_maxima)}</Text>
                    <Text style={[styles.cell, styles.col4]}>{formatDecimal(avaliacao.nota)}</Text>
                </View>
            ))}

            <View style={[styles.tableRow, styles.tableFooter]}>
                <Text style={[styles.cell, styles.col0]}></Text>
                <Text style={[styles.cell, styles.col1]}></Text>
                <Text style={[styles.cell, styles.col2]}></Text>
                <Text style={[styles.cell, styles.col3]}>{formatDecimal(totalNotaMaxima)}</Text>
                <Text style={[styles.cell, styles.col4]}>{formatDecimal(totalNota)}</Text>
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
