import React from "react";
import { Modal, StyleSheet, Text, TouchableOpacity, View } from "react-native";
import { DisciplinaType } from "@/types/aluno";
import { formatInteger } from "@/utils/formatUtils";
import { MaterialIcons, MaterialCommunityIcons } from "@expo/vector-icons";

type Props = {
    visible: boolean;
    onClose: () => void;
    disciplina: DisciplinaType | null;
};

export function DialogInformacoes({ visible, onClose, disciplina }: Props) {
    if (!disciplina) return null;

    return (
        <Modal visible={visible} transparent animationType='slide' onRequestClose={onClose}>
            <View style={styles.overlay}>
                <View style={styles.cardContainer}>
                    <View style={styles.headerRow}>
                        <Text style={styles.cardTitle}>{disciplina.nome}</Text>
                        <TouchableOpacity style={styles.closeButton} onPress={onClose}>
                            <MaterialIcons name='close' size={26} color='#fff' />
                        </TouchableOpacity>
                    </View>
                    <View style={styles.content}>
                        <View style={styles.row}>
                            <MaterialIcons name='menu-book' size={22} color='#007BFF' style={styles.icon} />
                            <Text style={styles.ementa}>{disciplina.ementa}</Text>
                        </View>
                        <View style={styles.infoBox}>
                            <View style={styles.row}>
                                <MaterialCommunityIcons name='school' size={20} color='#4CAF50' style={styles.icon} />
                                <Text style={styles.label}>Curso:</Text>
                                <Text style={styles.value}>{disciplina.curso}</Text>
                            </View>
                            <View style={styles.row}>
                                <MaterialCommunityIcons name='calendar' size={20} color='#FF9800' style={styles.icon} />
                                <Text style={styles.label}>Período:</Text>
                                <Text style={styles.value}>{disciplina.periodo}°</Text>
                            </View>
                            <View style={styles.row}>
                                <MaterialCommunityIcons
                                    name='account-tie'
                                    size={20}
                                    color='#9C27B0'
                                    style={styles.icon}
                                />
                                <Text style={styles.label}>Professor:</Text>
                                <Text style={styles.value}>{disciplina.professor}</Text>
                            </View>
                            <View style={styles.row}>
                                <MaterialCommunityIcons
                                    name='clock-outline'
                                    size={20}
                                    color='#2196F3'
                                    style={styles.icon}
                                />
                                <Text style={styles.label}>Carga horária:</Text>
                                <Text style={styles.value}>{formatInteger(disciplina.carga_horaria)}h</Text>
                            </View>
                        </View>
                    </View>
                </View>
            </View>
        </Modal>
    );
}

const styles = StyleSheet.create({
    overlay: {
        flex: 1,
        backgroundColor: "rgba(0,0,0,0.5)",
        justifyContent: "center",
        alignItems: "center",
    },
    cardContainer: {
        backgroundColor: "#fff",
        borderRadius: 12,
        padding: 0,
        maxWidth: 370,
        width: "92%",
        elevation: 4,
        overflow: "hidden",
    },
    headerRow: {
        flexDirection: "row",
        alignItems: "center",
        justifyContent: "space-between",
        backgroundColor: "#007BFF",
        paddingHorizontal: 16,
        paddingVertical: 12,
        borderTopLeftRadius: 12,
        borderTopRightRadius: 12,
    },
    cardTitle: {
        color: "#fff",
        fontWeight: "bold",
        fontSize: 18,
        flex: 1,
        marginRight: 8,
    },
    closeButton: {
        backgroundColor: "#0056b3",
        borderRadius: 16,
        padding: 2,
        marginLeft: 8,
    },
    content: {
        alignItems: "stretch",
        padding: 16,
    },
    row: {
        flexDirection: "row",
        alignItems: "flex-start",
        marginBottom: 8,
        flexWrap: "wrap",
    },
    icon: {
        marginRight: 8,
        marginTop: 2,
    },
    ementa: {
        fontSize: 15,
        color: "#333",
        flex: 1,
        fontStyle: "italic",
        marginBottom: 8,
        flexWrap: "wrap",
        textAlign: "justify",
    },
    infoBox: {
        backgroundColor: "#f5f7fa",
        borderRadius: 10,
        padding: 12,
        marginVertical: 10,
        elevation: 1,
    },
    label: {
        fontWeight: "bold",
        color: "#444",
        marginRight: 4,
        fontSize: 15,
    },
    value: {
        color: "#222",
        fontSize: 15,
    },
});
