import { login } from "@/api/auth";
import { RootStackParamList } from "@/types/navigation";
import { Ionicons } from "@expo/vector-icons";
import { zodResolver } from "@hookform/resolvers/zod";
import AsyncStorage from "@react-native-async-storage/async-storage";
import { NavigationProp, useNavigation } from "@react-navigation/native";
import React, { useState } from "react";
import { useForm } from "react-hook-form";
import { StyleSheet, Text, TextInput, TouchableOpacity, View } from "react-native";
import { SafeAreaView } from "react-native-safe-area-context";
import { z } from "zod";

const loginSchema = z.object({
    email: z
        .string()
        .nonempty("O e-mail é obrigatório")
        .regex(/^[a-zA-Z0-9._%+-]+@(ifnmg\.edu\.br|aluno\.ifnmg\.edu\.br)$/, "Use um e-mail institucional"),
    senha: z.string().nonempty("A senha é obrigatória").min(6, "A senha deve ter pelo menos 6 caracteres"),
});

type LoginData = z.infer<typeof loginSchema>;

export default function LoginScreen() {
    const navigation = useNavigation<NavigationProp<RootStackParamList>>();

    const [loading, setLoading] = useState(false);
    const [showPassword, setShowPassword] = useState(false);
    const [loginError, setLoginError] = useState("");

    const {
        register,
        setValue,
        handleSubmit,
        formState: { errors, isValid },
    } = useForm<LoginData>({
        resolver: zodResolver(loginSchema),
        mode: "onChange",
    });

    React.useEffect(() => {
        register("email");
        register("senha");
    }, [register]);

    const onSubmit = async (data: LoginData) => {
        setLoading(true);
        try {
            const response = await login(data.email, data.senha);
            const token = response.data.token;
            await AsyncStorage.setItem("token", token);
            navigation.navigate("home");
        } catch (e) {
            setLoginError("Usuário ou senha inválidos.");
        } finally {
            setLoading(false);
        }
    };

    return (
        <SafeAreaView style={styles.container}>
            <View style={styles.box}>
                <Text style={styles.title}>Cajuí Teste</Text>
                <Text style={styles.subtitle}>Bem-vindo! Faça login para continuar.</Text>
                {loginError ? (
                    <View style={{ backgroundColor: "#ffebee", borderRadius: 8, padding: 10, marginBottom: 12 }}>
                        <Text style={{ color: "#c62828", textAlign: "center" }}>{loginError}</Text>
                    </View>
                ) : null}
                <TextInput
                    style={styles.input}
                    placeholder='E-mail'
                    placeholderTextColor='#aaa'
                    keyboardType='email-address'
                    autoCapitalize='none'
                    onChangeText={(text) => setValue("email", text, { shouldValidate: true })}
                />
                <View style={{ width: "100%", marginBottom: 18 }}>
                    {errors.email && <Text style={{ color: "red", marginBottom: 8 }}>{errors.email.message}</Text>}
                    <View style={{ flexDirection: "row", alignItems: "center" }}>
                        <TextInput
                            style={[styles.input, { flex: 1, marginBottom: 0 }]}
                            placeholder='Senha'
                            placeholderTextColor='#aaa'
                            secureTextEntry={!showPassword}
                            onChangeText={(text) => setValue("senha", text, { shouldValidate: true })}
                        />
                        <TouchableOpacity
                            onPress={() => setShowPassword((prev) => !prev)}
                            style={{ position: "absolute", right: 16 }}>
                            <Ionicons name={showPassword ? "eye-off" : "eye"} size={24} color='#888' />
                        </TouchableOpacity>
                    </View>
                    {errors.senha && <Text style={{ color: "red", marginTop: 4 }}>{errors.senha.message}</Text>}
                </View>
                <TouchableOpacity
                    style={[styles.button, { opacity: isValid && !loading ? 1 : 0.5 }]}
                    onPress={handleSubmit(onSubmit)}
                    disabled={!isValid || loading}>
                    <Text style={styles.buttonText}>{loading ? "Entrando..." : "Entrar"}</Text>
                </TouchableOpacity>
            </View>
        </SafeAreaView>
    );
}

const styles = StyleSheet.create({
    container: {
        flex: 1,
        backgroundColor: "#e8f0fe",
        justifyContent: "center",
        alignItems: "center",
    },
    box: {
        width: "90%",
        maxWidth: 380,
        backgroundColor: "#fff",
        borderRadius: 18,
        padding: 32,
        shadowColor: "#000",
        shadowOffset: { width: 0, height: 4 },
        shadowOpacity: 0.15,
        shadowRadius: 12,
        elevation: 8,
        alignItems: "center",
    },
    title: {
        fontSize: 32,
        fontWeight: "bold",
        color: "#388e3c",
        marginBottom: 8,
        letterSpacing: 1,
    },
    subtitle: {
        fontSize: 16,
        color: "#666",
        marginBottom: 28,
    },
    input: {
        width: "100%",
        height: 50,
        borderColor: "#c8e6c9",
        borderWidth: 1.5,
        borderRadius: 10,
        paddingHorizontal: 16,
        marginBottom: 10,
        backgroundColor: "#f9fbe7",
        fontSize: 16,
        color: "#333",
    },
    button: {
        width: "100%",
        height: 50,
        backgroundColor: "#43a047",
        borderRadius: 10,
        justifyContent: "center",
        alignItems: "center",
        marginTop: 10,
        shadowColor: "#388e3c",
        shadowOffset: { width: 0, height: 2 },
        shadowOpacity: 0.2,
        shadowRadius: 4,
        elevation: 4,
    },
    buttonText: {
        color: "#fff",
        fontSize: 18,
        fontWeight: "bold",
        letterSpacing: 1,
    },
});
