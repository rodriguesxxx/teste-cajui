import { getAvaliacoes } from "@/api/aluno";
import { AvaliacoesType } from "@/types/aluno";
import { formatDate, formatDecimal } from "@/utils/formatUtils";
import { MaterialCommunityIcons } from "@expo/vector-icons";
import React, { useEffect, useState } from "react";
import { StyleSheet, Text, View } from "react-native";

type Props = {
    disciplina: number;
};

export function TabelaAvaliacoes({ disciplina }: Props) {
    const [avaliacoes, setAvaliacoes] = useState<AvaliacoesType[]>([]);

    useEffect(() => {
        const fetchAvaliacoes = async () => {
            try {
                const response = await getAvaliacoes(disciplina);
                setAvaliacoes(response.data);
            } catch (e) {
                // Alert.alert("Erro", "Não foi possível carregar as avaliações.");
            }
        };

        fetchAvaliacoes();
    }, [disciplina]);
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
