lado_r = int(input())
lado_g = int(input())
lado_b = int(input())

n_etiquetas_g = int(lado_r / lado_g)**2
n_etiquetas_b = int(lado_g / lado_b)**2 * n_etiquetas_g

total_etiquetas = 1 + n_etiquetas_g + n_etiquetas_b

print(total_etiquetas)